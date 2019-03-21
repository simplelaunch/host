#!/bin/bash
ROOT=$PWD

NEW_SITE_URL=$1
SITES_PATH="$ROOT/sites"
NEW_SITE_PATH="$SITES_PATH/$NEW_SITE_URL"
cp -R "$SITES_PATH/starter" "$SITES_PATH/$NEW_SITE_URL"



ln -s "$ROOT/core" "$SITES_PATH/$NEW_SITE_URL/core"

SYMLINKS_CONTENT=(
    "plugins"
    "themes"
    "mu-plugins"
    )
for FOLDER in "${SYMLINKS_CONTENT[@]}"
do
   echo "$FOLDER"
   ln -s "$ROOT/$FOLDER" "$SITES_PATH/$NEW_SITE_URL/$FOLDER"
   # or do whatever with individual element of the array
done


#ln -s "$ROOT/plugins" "$SITES_PATH/$NEW_SITE_URL/plugins"
#ln -s "$ROOT/themes" "$SITES_PATH/$NEW_SITE_URL/themes"
#ln -s "$ROOT/mu-plugins" "$SITES_PATH/$NEW_SITE_URL/mu-plugins"
