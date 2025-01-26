# Tickets

## New codes contain a character we don't want
It's been decided that we need to remove the '1' character from generated codes as users are confusing them with 
other characters.

## Codes don't seem to be sufficiently random
The test we have in place to ensure codes are sufficiently random does not appear to pass reliably. Investigate why
this might be. Starting point: https://www.php.net/manual/en/function.rand.php

## Codes are lasting too long
The story called for codes that lasted 1 month but they seem to be lasting for twice that.

## Organisation is being shown as empty
Displayed codes don't appear to have a recorded organisation. This is making it difficult for our users

## Give feedback on the PR
What feedback would you give for the open PR?
[https://github.com/ramchale/supreme-octo-broccoli/pull/1]