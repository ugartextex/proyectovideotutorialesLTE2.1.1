document.addEventListener('DOMContentLoaded', function() {
  const changePasswordForm = document.getElementById('changePasswordForm');

  changePasswordForm.addEventListener('submit', function(event) {
    event.preventDefault();

    const currentPassword = document.getElementById('currentPassword').value;
    const newPassword = document.getElementById('newPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    // Aquí debes implementar la lógica para verificar las contraseñas y realizar el cambio

    if (newPassword === confirmPassword) {
      // Aquí puedes hacer una llamada a un servidor para cambiar la contraseña o realizar otras acciones
      alert('Contraseña cambiada exitosamente.');
      changePasswordForm.reset();
    } else {
      alert('Las contraseñas no coinciden. Inténtalo de nuevo.');
    }
  });
});