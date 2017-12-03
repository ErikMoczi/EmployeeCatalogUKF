<?php

namespace App\Repositories\DataLoading;

use App\Exceptions\GeneralException;
use App\Facades\General\EmailHelper;
use App\Models\Auth\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

    /**
     * @param array $data
     * @return User
     */
    public function createUnique(array $data)
    {
        return DB::transaction(function () use ($data) {
            $data['email'] = $this->getUniqueEmail($data['email']);

            return parent::create($data, false);
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

    /**
     * @param array $input
     * @return bool
     * @throws GeneralException
     */
    public function updatePassword(array $input)
    {
        $user = $this->getById(auth()->id());

        if (Hash::check($input['oldPassword'], $user->password)) {
            $user->password = bcrypt($input['password']);

            return $user->save();
        }

        throw new GeneralException('That is not your old password.');
    }

    /**
     * @param int $id
     * @param array $input
     * @return array|bool
     * @throws GeneralException
     */
    public function update(int $id, array $input)
    {
        $user = $this->getById($id);
        $user->name = $input['name'];

        if ($user->email != $input['email']) {
            if ($this->getByColumn($input['email'], 'email')) {
                throw new GeneralException('That e-mail address is already taken.');
            }

            $user->email = $input['email'];
            $updated = $user->save();

            return [
                'success' => $updated,
                'email_changed' => true,
            ];
        }

        return $user->save();
    }
}
