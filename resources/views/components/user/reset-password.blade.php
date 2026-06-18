<div>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#formResetPassword{{ $id }}">
  <i class="fas fa-lock-open"></i>
  Reset Password
</button>

<!-- Modal -->
<div class="modal fade" id="formResetPassword{{ $id }}" tabindex="-1" aria-labelledby="formResetPasswordLabel{{ $id }}" aria-hidden="true">
  <form action="{{ route('users.reset-password', $id) }}" method="POST">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formResetPasswordLabel{{ $id }}">Form Reset Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Reset Password</button>
      </div>
    </div>
  </div>
</form>
</div>
</div>