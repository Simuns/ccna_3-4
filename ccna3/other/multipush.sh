#!/bin/bash
echo "-------Pulling Sihrep------"
cd /home/simuns/git/sihrep/skuli/H2
git pull
echo "-------Pulling Github------"
cd /home/simuns/git/githubrep/ccna_3-4
git pull
echo "press 1 for Sihrep ¤--> Github"
echo "press 2 for Sihrep <--¤ Github"
read choise
if [ "$choise" = "1" ]
then
   echo "------Merging from Sihrep ¤--> Github"
   unison -ui text /home/simuns/git/sihrep/skuli/H2/ccna3/ /home/simuns/git/githubrep/ccna_3-4/ccna3/ -force /home/simuns/git/sihrep/skuli/H2/ccna3/   
else
   echo "------Merging from Sihrep <--¤ Github"
   unison -ui text /home/simuns/git/sihrep/skuli/H2/ccna3/ /home/simuns/git/githubrep/ccna_3-4/ccna3/ -force /home/simuns/git/githubrep/ccna_3-4/ccna3/
fi
cd /home/simuns/git/sihrep/skuli/H2
echo "Pulled sihrep"
echo "Commit msg for both repo's"
read commitmsg
echo "------Pushing Sihrep------"
git add *
git commit -am "$commitmsg"
git push
cd /home/simuns/git/githubrep/ccna_3-4
echo "------Pushing Github------"
git add *
git commit -am "$commitmsg"
git push
