#!/bin/sh

if [ -e .git/hooks ]
then
    if [ -e -e vendor/chaplean/coding-standard ]
    then
        cp vendor/chaplean/coding-standard/hooks/pre-commit .git/hooks/pre-commit
        chmod +x .git/hooks/pre-commit
    fi
fi
