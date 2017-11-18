# Pretty Param Middleware for Laravel 5.5

PHP doesn't handle form submission with array fields nicely. If you're submitting the form via GET you end up with something like `field%5B%5D=value_1&field%5B%5D=value_2`. That's not pretty.

This middleware allows you to leave off the `[]` and end up with `field=value_1&field=value_2`. That's pretty.
