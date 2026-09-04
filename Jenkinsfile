pipeline { // Define el inicio del bloque principal de la canalización de Jenkins (Declarative Pipeline)
    agent any // Indica que el pipeline se puede ejecutar en cualquier nodo o agente disponible en Jenkins

    environment { // Sección para definir variables de entorno que estarán disponibles en todos los pasos
        COMPOSER_HOME = 'composer' // Define el directorio de trabajo local para el gestor de paquetes Composer
        RENDER_HOOK = credentials('RENDER_DEPLOY_HOOK') // Recupera la URL secreta de Render guardada en las credenciales de Jenkins y la asigna a RENDER_HOOK
    }

    stages { // Contenedor global que agrupa todas las fases o etapas del proceso

        // ==========================================
        // 🔄 CONTINUOUS INTEGRATION (CI)
        // ==========================================

        stage('Checkout') { // Etapa para obtener el código fuente desde el repositorio remoto
            steps { // Bloque de instrucciones a ejecutar dentro de esta etapa
                echo 'Obteniendo el código del repositorio...' // Muestra un mensaje informativo en la consola de Jenkins
                git branch: 'master', url: 'git@github.com:BigBang1498/PI.-Aplicaci-n-web-din-mica-en-un-servicio-de-la-nube.git' // Clona o descarga la rama 'master' usando la clave SSH configurada
            }
        }

        stage('Install Dependencies') { // Etapa para descargar los paquetes y librerías que requiere PHP
            steps {
                echo 'Instalando dependencias de Composer...' // Muestra un mensaje en consola sobre el estado del proceso
                sh 'composer install --no-interaction --prefer-dist' // Ejecuta el comando en la terminal para instalar dependencias sin pedir confirmaciones manuales
            }
        }

        stage('Run Tests') { // Etapa para validar el correcto funcionamiento de la aplicación mediante pruebas
            steps {
                echo 'Ejecutando pruebas unitarias con PHPUnit...' // Muestra un mensaje informativo antes de ejecutar los tests
                sh './vendor/bin/phpunit' // Ejecuta las pruebas automatizadas de la app. Si falla un test, el pipeline se detiene aquí
            }
        }

        // ==========================================
        // 🚀 CONTINUOUS DEPLOYMENT (CD)
        // ==========================================

        stage('Deploy to Render') { // Etapa encargada de enviar la notificación al servidor en la nube para actualizar la app
            steps {
                echo 'Notificando a Render para iniciar el despliegue...' // Muestra un mensaje en la consola indicando que iniciará el despliegue
                sh 'curl -X POST "$RENDER_HOOK"' // Realiza una petición HTTP POST a la URL de Render para indicarle que clone los cambios y despliegue a producción
            }
        }
    }
}