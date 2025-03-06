<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio - Sistema Médico</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-blue-100 to-blue-300">
    
    <!-- Incluir el encabezado -->
    <div id="cabez"></div>

    <main class="container mx-auto p-8 mt-24">
        <section id="hospitales" class="text-center mb-16">
            <h2 class="text-5xl font-bold mb-8 text-gray-800">Nuestros Hospitales</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-xl overflow-hidden transition-transform transform hover:scale-105 hover:shadow-2xl">
                    <img src="../src/hospital1.jpg" alt="Hospital 1" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-3xl text-gray-800">Hospital General</h3>
                        <p class="text-gray-600 text-lg">Brindamos atención médica de calidad.</p>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-xl overflow-hidden transition-transform transform hover:scale-105 hover:shadow-2xl">
                    <img src="../src/hospital2.jpg" alt="Hospital 2" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-3xl text-gray-800">Clínica Especializada</h3>
                        <p class="text-gray-600 text-lg">Especialistas en diversas áreas de la salud.</p>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-xl overflow-hidden transition-transform transform hover:scale-105 hover:shadow-2xl">
                    <img src="../src/hospital3.jpg" alt="Hospital 3" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-3xl text-gray-800">Centro de Salud</h3>
                        <p class="text-gray-600 text-lg">Atención integral para toda la familia.</p>
                    </div>
                </div>
            </div>
        </section>
        <section id="partner" class="bg-blue-700 text-white py-16 mb-16 rounded-lg shadow-xl bg-cover bg-center" style="background-image: url('ruta/a/tu/imagen.jpg');">
    <div class="container mx-auto text-center">
        <h2 class="text-5xl font-bold mb-6">Tu Socio en Salud y Bienestar</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">
            Estamos comprometidos a brindarte los mejores servicios médicos y de atención médica para ayudarte a vivir más sano y feliz.
        </p>
        <a href="#" class="bg-white text-blue-700 font-bold py-3 px-8 rounded-lg hover:bg-gray-200 transition duration-300">
            Ver cómo trabajamos
        </a>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-12">
            <div class="bg-white text-blue-700 p-6 rounded-lg shadow-lg">
                <h3 class="text-4xl font-bold">150K +</h3>
                <p class="text-lg">Pacientes Recuperados</p>
            </div>
            <div class="bg-white text-blue-700 p-6 rounded-lg shadow-lg">
                <h3 class="text-4xl font-bold">870+</h3>
                <p class="text-lg">Médicos</p>
            </div>
        </div>
    </div>
</section>main>

     
      <section id="sobre-nosotros" class="bg-white p-10 rounded-lg shadow-xl mb-16">
            <h2 class="text-5xl font-semibold text-center mb-6 text-gray-800">Sobre Nosotros</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <img src="../src/doctores.jpg" alt="Sobre Nosotros" class="w-full rounded-lg shadow-lg">
                <div>
                    <h3 class="text-3xl font-bold text-gray-800 mb-4">ProHealth</h3>
                    <p class="text-gray-700 text-lg leading-relaxed mb-4">
                        ProHealth es un equipo de profesionales médicos con experiencia, dedicado a brindar servicios de atención médica de la más alta calidad. Creemos en un enfoque holístico de la salud que se centra en tratar a la persona en su totalidad, no solo la enfermedad o los síntomas.
                    </p>
                    <ul class="text-gray-700 text-lg">
                        <li class="mb-2">✔️ Atención médica integral.</li>
                        <li class="mb-2">✔️ Profesionales altamente capacitados.</li>
                        <li class="mb-2">✔️ Tecnología de vanguardia.</li>
                        <li class="mb-2">✔️ Enfoque en el bienestar del paciente.</li>
                    </ul>
                </div>
            </div>
        </section>
        
        <section id="testimonios" class="mb-16">
            <h2 class="text-5xl font-semibold text-center mb-8 text-gray-800">Testimonios</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-lg shadow-xl">
                    <p class="text-gray-700 italic text-lg">"Excelente servicio y atención personalizada. 100% recomendado."</p>
                    <p class="text-blue-600 font-bold mt-4 text-xl">- María López</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-xl">
                    <p class="text-gray-700 italic text-lg">"Los médicos son altamente capacitados y muy amables."</p>
                    <p class="text-blue-600 font-bold mt-4 text-xl">- Juan Pérez</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-xl">
                    <p class="text-gray-700 italic text-lg">"Instalaciones de primer nivel y tecnología de punta."</p>
                    <p class="text-blue-600 font-bold mt-4 text-xl">- Ana Rodríguez</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Incluir el footer -->
    <div id="pie"></div>

    <!-- Script para incluir los archivos -->
    <script>
        // Función para cargar el contenido de un archivo
        function cargarContenido(url, elementoId) {
            fetch(url)
                .then(response => response.text())
                .then(data => {
                    document.getElementById(elementoId).innerHTML = data;
                })
                .catch(error => console.error('Error al cargar el archivo:', error));
        }

        // Cargar el encabezado y el footer
        cargarContenido('cabez.html', 'cabez');
        cargarContenido('pie.html', 'pie');
    </script>
</body>
</html>