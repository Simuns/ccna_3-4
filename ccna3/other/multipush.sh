#!/bin/bash
shopt -s expand_aliases
source ~/.bashrc
cdgit
echo "-------Pulling Sihrep------"
cd sihrep/skuli/H2
git pull
echo "-------Pulling Github------"
cdgit
cd githubrep/ccna_3-4
git pull
cdgit
echo "press 1 for Sihrep ¤--> Github"
echo "press 2 for Sihrep <--¤ Github"
read choise
if [ "$choise" = "1" ]
then
   echo "------Merging from Sihrep ¤--> Github"
   unison -ui text sihrep/skuli/H2/ccna3/ githubrep/ccna_3-4/ccna3/ -force sihrep/skuli/H2/ccna3/   
else
   echo "------Merging from Sihrep <--¤ Github"
   unison -ui text sihrep/skuli/H2/ccna3/ githubrep/ccna_3-4/ccna3/ -force githubrep/ccna_3-4/ccna3/
fi
cdgit
cd sihrep/skuli/H2
echo "Pulled sihrep"
echo "Commit msg for both repo's"
read commitmsg
echo "------Pushing Sihrep------"
git add *
git commit -am "$commitmsg"
git push
cdgit
cd githubrep/ccna_3-4
echo "------Pushing Github------"
git add *
git commit -am "$commitmsg"
git push
