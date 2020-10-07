# :closed_lock_with_key: LastPass Clone
LastPass is a password manager that stores all your login credentials in a secured vault

This project has been developed as a part of CSS Assignment 1 by Manali Bagwe, Netra Ghaisas and Bhagyashree Phadnis

## Features implemented
:key: Master Password to unlock your secure password vault
:arrows_counterclockwise: Randomly generate strong passwords locally
:muscle: Test password strength locally
_Note: Passwords are generated and tested locally with JavaScript and never sent in cleartext form to the database_

## Architecture
![image info](./images/architecture.jpg)


This project uses the SJCL library at https://github.com/bitwiseshiftleft/sjcl for encryption, decryption, password hashing and random number generation
