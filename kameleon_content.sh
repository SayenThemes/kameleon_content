#!/bin/bash
####################################################################################################################
#
#								Bash Script to Automate kameleon Projects And Github
#
####################################################################################################################
"/opt/FreeFileSync/FreeFileSync" "kameleon_content.ffs_batch"
chmod 777 -R "kameleon_content"
git add *
echo "Please enter the commit title?"
read commitTitle
git commit -m $commitTitle
git push -u origin master