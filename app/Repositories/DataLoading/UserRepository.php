<?php

namespace App\Repositories\DataLoading;

use App\Facades\General\EmailHelper;
use App\Models\Auth\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class UserRepository
 * @package App\Repositories\DataLoading
 */
class UserRepository extends BaseRepository
{
    public function model()
    {
        return User::class;
    }

    public function create(array $data, bool $forceCreate = true)
    {
        return DB::transaction(function () use ($data, $forceCreate) {
            $data['email'] = $this->getUniqueEmail($data['email']);

            $user = parent::create($data, $forceCreate);

            return $user;
        });
    }

    /**
     * @param string $email
     * @return string
     */
    private function getUniqueEmail(string $email): string
    {
        $position = 1;
        $newEmail = $email;
        while ($this->userExistsByEmail($newEmail)) {
            $position++;
            $newEmail = EmailHelper::transformEmail($email, $position);
        }

        return $newEmail;
    }

    /**
     * @param string $email
     * @return bool
     */
    public function userExistsByEmail(string $email): bool
    {
        return $this->model
                ->where('email', $email)
                ->count() > 0;
    }
}
