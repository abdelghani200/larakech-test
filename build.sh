#!/bin/sh

# Installez les dépendances nécessaires
apt-get update && apt-get install -y libssl1.0.0

# Exécutez le build
npm run build
