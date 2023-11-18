#!/bin/bash

if command -v mysql &>/dev/null; then
    echo "Hacer el programa"
else
    echo "Mysql isn't install please install it, using #sudo apt-get install mysql-server# => for a debian/ubuntu based distro / #sudo pacman -S mysql# => for an Arch based distro / #sudo dnf install mysql-community-server# => for a fedora based distro, is you use an other distro look in the distro Docs."
fi