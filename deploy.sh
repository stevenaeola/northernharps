#!/bin/bash
git add .
git commit
git push origin master
ssh stev5295@www.northernharps.co.uk <<EOF
cd public_html
git pull
chmod -R 755 .
EOF
