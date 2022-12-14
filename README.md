# Simple trufflehog parser to Slack webhook

## Setup:
Edit `trufflehogSlack` for `SLACK_WEBHOOK` to match your webhook.

## Usage:
1. `trufflehog git [opts] > truffle_output`
2. `php trufflehogSlack.php ./truffle_output`
