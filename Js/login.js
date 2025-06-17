document.addEventListener('DOMContentLoaded', () => {
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    // Botón "Registrarse" en el overlay
    signUpButton.addEventListener('click', () => {
        container.classList.add('right-panel-active');
    });

    // Botón "Iniciar Sesión" en el overlay
    signInButton.addEventListener('click', () => {
        container.classList.remove('right-panel-active');
    });

    // Manejar el submit del formulario de INICIO DE SESIÓN
    // Importante: Esto es solo un ejemplo de redirección.
    // En un sistema real, aquí enviarías los datos a un backend para autenticación.
    const actualSignInButton = document.querySelector('.sign-in-container button');
    actualSignInButton.addEventListener('click', (e) => {
        e.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

        // ** Aquí iría tu lógica de autenticación real **
        // Por ejemplo:
        // const email = document.querySelector('.sign-in-container input[type="email"]').value;
        // const password = document.querySelector('.sign-in-container input[type="password"]').value;

        // if (email === "test@example.com" && password === "password") {
        //     alert('¡Inicio de sesión exitoso!');
        //     window.location.href = 'index.html'; // Redirige al dashboard
        // } else {
        //     alert('Credenciales incorrectas. Inténtalo de nuevo.');
        // }

        // Como esto es solo un diseño, vamos a redirigir directamente al dashboard
        // si el usuario presiona el botón "Iniciar Sesión" del formulario.
        // Si necesitas validación, descomenta y adapta el código de arriba.
        window.location.href = 'index.html'; // Redirige al archivo del dashboard
    });

    // Opcional: Manejar el submit del formulario de REGISTRO
    // Puedes añadir una lógica similar si necesitas simular un registro
    const actualSignUpButton = document.querySelector('.sign-up-container button');
    actualSignUpButton.addEventListener('click', (e) => {
        e.preventDefault(); // Evita que el formulario se envíe de forma predeterminada
        alert('Registro simulado exitoso. Ahora puedes iniciar sesión.');
        // Opcional: Redirigir automáticamente al panel de inicio de sesión después del registro
        container.classList.remove('right-panel-active');
    });
});