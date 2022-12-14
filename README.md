# Simple trufflehog parser to Slack webhook

## Setup:
1. `git clone https://github.com/thistehneisen/simple-trufflehog-slack-webhook-parser/`
2. Edit `trufflehogSlack.php` for `SLACK_WEBHOOK` to match your webhook.

## Usage:
1. `trufflehog git [opts] > truffle_output`
2. `php trufflehogSlack.php ./truffle_output`
