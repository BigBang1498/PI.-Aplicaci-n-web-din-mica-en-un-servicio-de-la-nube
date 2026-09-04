pipeline {
    agent any

    environment {
        RENDER_HOOK = credentials('RENDER_DEPLOY_HOOK')
    }

    stages {
        stage('Checkout') {
            steps {
                echo 'Obteniendo el código del repositorio ...'
                git branch: 'master', url: 'git@github.com:BigBang1498/PI.-Aplicaci-n-web-din-mica-en-un-servicio-de-la-nube.git'
                
            }
        }

        stage('Deploy') {
            steps {
                echo 'Notificando a Render para iniciar el despliegue...'
                sh 'curl -X POST "$RENDER_HOOK"'
            }
        }

    }
}