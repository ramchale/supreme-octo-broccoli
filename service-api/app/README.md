# Tickets

## New codes contain a character we don't want
It's been decided that we need to remove the '1' character from generated codes as users are confusing them with 
other characters.

## Codes don't seem to be sufficiently random
The test we have in place to ensure codes are sufficiently random does not appear to pass reliably. Investigate why
this might be. Starting point: https://www.php.net/manual/en/function.rand.php

## A duplicate code has somehow got through
An unwanted and unlikely duplicate code has been found in the database. How has this gotten through?

## Codes are lasting too long
The story called for codes that lasted 1 month but they seem to be lasting for twice that.

## Organisation is being shown as empty
Displayed codes don't appear to have a recorded organisation. This is making it difficult for our users
