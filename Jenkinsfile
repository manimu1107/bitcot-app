pipeline {
    agent any

    environment {
        DOCKER_HUB_CREDENTIALS = 'Dockerhub'
        IMAGE_NAME = 'bitcot-php-app'
        IMAGE_TAG = 'latest'
        DOCKER_USERNAME = 'manimu1107'
    }

    stages {
        stage('Building & Dockerizing') {
            steps {
                script {
                    sh "docker build -t $IMAGE_NAME:$IMAGE_TAG -f Dockerfile ."
                }
            }
        }

        stage('Pushing Docker Image') {
            steps {
                script {                
                    withCredentials([usernamePassword(credentialsId: DOCKER_HUB_CREDENTIALS, passwordVariable: 'DOCKER_PASSWORD', usernameVariable: 'DOCKER_USERNAME')]) {
                        sh "docker login -u $DOCKER_USERNAME -p $DOCKER_PASSWORD"
                    }

                
                    sh "docker tag $IMAGE_NAME:$IMAGE_TAG $DOCKER_USERNAME/$IMAGE_NAME:$IMAGE_TAG"

                    // Push Docker image to Docker Hub
                    sh "docker push $DOCKER_USERNAME/$IMAGE_NAME:$IMAGE_TAG"
                }
            }
        }

        stage('Deployment') {
            steps {
                script {
                   
                    sh "docker pull $DOCKER_USERNAME/$IMAGE_NAME:$IMAGE_TAG"

                   
                    sh "docker stop $IMAGE_NAME || true"
                    sh "docker rm $IMAGE_NAME || true"

                    
                    sh "docker run -d --name $IMAGE_NAME -p 8081:80 $DOCKER_USERNAME/$IMAGE_NAME:$IMAGE_TAG"
                }
            }
        }
    }
}
