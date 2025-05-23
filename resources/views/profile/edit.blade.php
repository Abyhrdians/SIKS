@extends('layouts.app')


@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-user-edit me-2"></i> Edit Profil</h5>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Foto Profil -->
                        <div class="text-center mb-4">
                            <div class="position-relative d-inline-block">
                                <img id="profilePreview" src="{{ $user->foto ? asset('storage/'.$user->foto) :  asset('assets/img/foto_default.png') }}"
                                     class="rounded-circle border border-3 border-primary shadow"
                                     width="120" height="120" alt="Foto Profil">
                                <label for="profileImage" class="btn btn-sm btn-primary rounded-pill position-absolute bottom-0 end-0">
                                    <i class="fas fa-camera"></i>
                                </label>
                                <input type="file" id="profileImage" name="profile_image" class="d-none" accept="image/*">
                                @if($user->profile_image)
                                    <button type="button" class="btn btn-sm btn-danger rounded-pill position-absolute top-0 end-0"
                                            onclick="deleteProfileImage()">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                @endif
                            </div>
                            <div class="mt-2 small text-muted">Format: JPG/PNG (Maks. 2MB)</div>
                            @error('profile_image')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Informasi Pengguna -->
                        <h6 class="mb-3 text-primary"><i class="fas fa-info-circle me-2"></i> Informasi Dasar</h6>

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-user text-primary"></i></span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-envelope text-primary"></i></span>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                       id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Keamanan Akun -->
                        <h6 class="mb-3 mt-4 text-primary"><i class="fas fa-lock me-2"></i> Keamanan Akun</h6>

                        <div class="mb-3">
                            <label for="current_password" class="form-label">Password Saat Ini</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-key text-primary"></i></span>
                                <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                                       id="current_password" name="current_password">
                                <button class="btn btn-outline-secondary toggle-password" type="button">
                                    <i class="fas fa-eye"></i>
                                </button>
                                @error('current_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
                        </div>

                        <div class="mb-3">
                            <label for="new_password" class="form-label">Password Baru</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-key text-primary"></i></span>
                                <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                                       id="new_password" name="new_password">
                                <button class="btn btn-outline-secondary toggle-password" type="button">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="password-strength mt-2">
                                <div class="progress" style="height: 4px;">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 0%"></div>
                                </div>
                                <small class="text-muted">Kekuatan password: <span class="strength-text">Lemah</span></small>
                            </div>
                            @error('new_password')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-key text-primary"></i></span>
                                <input type="password" class="form-control"
                                       id="new_password_confirmation" name="new_password_confirmation">
                                <button class="btn btn-outline-secondary toggle-password" type="button">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ url('/dashboard') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-2"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-save me-2"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Preview gambar profil
    const profileImage = document.getElementById('profileImage');
    const profilePreview = document.getElementById('profilePreview');

    profileImage.addEventListener('change', function(e) {
        if (e.target.files && e.target.files[0]) {
            const file = e.target.files[0];

            // Validasi ukuran file
            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran file maksimal 2MB');
                return;
            }

            // Preview gambar
            const reader = new FileReader();
            reader.onload = function(event) {
                profilePreview.src = event.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    // Toggle password visibility
    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', function() {
            const input = this.parentElement.querySelector('input');
            const icon = this.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
    });

    // Password strength indicator
    const newPassword = document.getElementById('new_password');
    const progressBar = document.querySelector('.password-strength .progress-bar');
    const strengthText = document.querySelector('.strength-text');

    newPassword.addEventListener('input', function() {
        const password = this.value;
        let strength = 0;

        // Length
        if (password.length >= 8) strength += 1;
        if (password.length >= 12) strength += 1;

        // Complexity
        if (/[A-Z]/.test(password)) strength += 1;
        if (/[0-9]/.test(password)) strength += 1;
        if (/[^A-Za-z0-9]/.test(password)) strength += 1;

        // Update UI
        let width, color, text;

        if (password.length === 0) {
            width = 0;
            color = 'bg-danger';
            text = '';
        } else if (strength <= 2) {
            width = 33;
            color = 'bg-danger';
            text = 'Lemah';
        } else if (strength <= 4) {
            width = 66;
            color = 'bg-warning';
            text = 'Sedang';
        } else {
            width = 100;
            color = 'bg-success';
            text = 'Kuat';
        }

        progressBar.style.width = width + '%';
        progressBar.className = 'progress-bar ' + color;
        strengthText.textContent = text;
        strengthText.className = 'strength-text ' +
            (color === 'bg-success' ? 'text-success' :
             color === 'bg-warning' ? 'text-warning' : 'text-danger');
    });
});

// Hapus foto profil
function deleteProfileImage() {
    if (confirm('Apakah Anda yakin ingin menghapus foto profil?')) {
        fetch('{{ route("profile.image.delete") }}', {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('profilePreview').src = 'https://via.placeholder.com/150';
                location.reload();
            }
        })
        .catch(error => console.error('Error:', error));
    }
}
</script>
@endsection
