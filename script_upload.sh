#!/bin/bash
#connect mysql in phpmyadmin and execute a command insert to insert a data
/opt/lampp/bin/mysql -h localhost -u zhao -ppassroot << SCRIPT
INSERT INTO \`sae23\`.\`mesure\` (\`id\`, \`horaire\`, \`valeur\`, \`nom_capteur\`) VALUES (NULL, CURRENT_TIMESTAMP, '$1', '$2');
exit;
SCRIPT
