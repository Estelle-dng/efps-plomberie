#!/bin/bash -l
#$ -S /bin/bash

name=$1
name=${name,,}
NAME=${name^^}
Name=`sed 's/\(.\)/\U\1/' <<< "$name"`

plugindir='../plugins'
pluginname='ilio-'$name

if [ "$name" = '' ]
then
    echo "You have to specify a plugin name on the first argument"
    exit 1;
fi

if [ -d "$plugindir/$pluginname/" ]; then
    echo "This plugin already exist"
    exit 1;
fi

cp -R ./plugin_blank $plugindir/$pluginname

find $plugindir/$pluginname/ -type f -exec sed -i -e "s/blank/$name/g" {} \;
find $plugindir/$pluginname/ -type f -exec sed -i -e "s/Blank/$Name/g" {} \;
find $plugindir/$pluginname/ -type f -exec sed -i -e "s/BLANK/$NAME/g" {} \;

mv $plugindir/$pluginname/ilio-blank.php $plugindir/$pluginname/ilio-$name.php
mv "$plugindir/$pluginname/includes/blank.post-type.php" "$plugindir/$pluginname/includes/$name.post-type.php"
mv "$plugindir/$pluginname/includes/js/app.blank.js" "$plugindir/$pluginname/includes/js/app.$name.js"
mv "$plugindir/$pluginname/frontend/views/blank.single.php" "$plugindir/$pluginname/frontend/views/$name.single.php"
