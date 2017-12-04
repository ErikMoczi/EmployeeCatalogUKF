<li class="header">Administration panel</li>
<li class="{{ active_class(Active::checkUriPattern('admin/comment*')) }}">
    <a href="{{ route('admin.comment.index') }}">
        <i class="fa fa-comment-o"></i>
        <span>Manage comments</span>
        <span class="pull-right-container">
            <span class="label label-{{ $comment_notapproved > 0 ? 'danger' : 'success' }} pull-right">{{ $comment_notapproved }}</span>
        </span>
    </a>
</li>
