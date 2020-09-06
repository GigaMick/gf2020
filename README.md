# GetFed 2020
Clean slate GetFed build for the 2020 reboot

## User Record
Everything that has a 1-2-1 relationship with the User is now simply in the User record. No longer do we have `user_location` and `user_profile` tables. Everything is on the user record.

## Roles / Permission
No longer does the user have a `membertype`. Everything regarding permissions and access is now controlled by the `roles` table.
