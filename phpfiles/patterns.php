<?php
// REGULAR EXPRESSIONS — every validation pattern lives here

// Username: 3-30 characters, letters, numbers, underscore or dot
const PATTERN_USERNAME = '/^[A-Za-z0-9_.]{3,30}$/';

// Email: name@domain.tld
const PATTERN_EMAIL = '/^[A-Za-z0-9._%+\-]+@[A-Za-z0-9\-]+(\.[A-Za-z0-9\-]+)*\.[A-Za-z]{2,}$/';

// Login password: at least 5 characters, cannot start or end with a space
const PATTERN_LOGIN_PASSWORD = '/^(?!\s)(?!.*\s$).{5,}$/';

// Full name: starts with a letter, then letters, spaces, apostrophes, dots or hyphens (2-60 chars, Unicode-aware)
const PATTERN_FULL_NAME = '/^\p{L}[\p{L}\p{M}\'.\- ]{1,59}$/u';

// New password: 8+ characters with at least one letter and one number
const PATTERN_NEW_PASSWORD = '/^(?=.*[A-Za-z])(?=.*\d).{8,}$/';
