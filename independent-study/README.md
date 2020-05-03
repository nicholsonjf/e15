# Wrangling your Laravel Logs with AWS CloudWatch
*By James Nicholson*

<img src="images/cloudwatch-dashboard2.png" width="800"/>

## Introduction

The goal of this document is to guide the reader through the process of setting up Amazon Cloudwatch to aggregate
log files from a Laravel application running on Ubuntu 18.04.

No matter what technology stack you're using, log files are always important. You may not always need them, but when
you do it's usually because there's some kind of problem in your application. In the case of dealing with a bug that's
frusterating users, you don't want to be wasting time searching your file system for the right line of the right log
file that will shed light on your issue. This is where logging analytics platforms shine.

Amazon Cloudwatch is a powerful logging and monitoring analytics platform. Here's a description of it's capabilities
from Amazon's website:

>CloudWatch collects monitoring and operational data in the form of logs, metrics, and events, providing you with a unified view of AWS resources, applications, and services that run on AWS and on-premises servers. You can use CloudWatch to detect anomalous behavior in your environments, set alarms, visualize logs and metrics side by side, take automated actions, troubleshoot issues, and discover insights to keep your applications
running smoothly.

Don't be confused by the mention of "services that run on AWS and on-premises servers". CloudWatch is also compatible
with other cloud computing providers, such as DigitalOcean.

#### What log files to collect?

Every application will have different log files that are important. It depends what the technology stack is. In this
guide we're dealing with a Laravel application running a LAMP stack on Ubuntu 18.04. For the sake of brevity, we're
going to focus on a few important log files for this stack:

1. Default Laravel log file (with $ROOT being the root of your Laravel application)
  
`$ROOT/storage/logs/laravel.log`

2. MySQL error log  
  
`/var/log/mysql/error.log`

3. Apache error log  
  
`/var/log/apache2/error.log`

4. Ubuntu system log  
  
`/var/log/syslog`


## Create the AWS IAM User

1. Sign in to the AWS Management Console and open the IAM console at https://console.aws.amazon.com/iam/
2. In the navigation pane, choose Users, and then choose Add user.
<img src="images/iam.users.png" width="500"/>

## Install and Configure the CloudWatch Agent on Ubuntu 18.04

1. SSH into your server as the `root` user.
2. Navigate to the /tmp directory.  
`cd /tmp`
3. Download the CloudWatch Agent  
`wget https://s3.amazonaws.com/amazoncloudwatch-agent/ubuntu/amd64/latest/amazon-cloudwatch-agent.deb`
4. Install the CloudWatch Agent  
`dpkg -i -E ./amazon-cloudwatch-agent.deb`
5. Use the agent configuration wizard to create your config file. For more information on answering all the questions
correctly see [this Amazon documentation](https://docs.aws.amazon.com/AmazonCloudWatch/latest/monitoring/create-cloudwatch-agent-configuration-file-wizard.html). When it asks if you want to add log files, use the URLs above.  
`/opt/aws/amazon-cloudwatch-agent/bin/amazon-cloudwatch-agent-config-wizard`


## Start the CloudWatch service

`/opt/aws/amazon-cloudwatch-agent/bin/amazon-cloudwatch-agent-ctl -a fetch-config -m onPremise -c file:/opt/aws/amazon-cloudwatch-agent/bin/config.json -s`

You should now be able to visit your CloudWatch console and view the logs you setup above.


## Sources

1. AWS CloudWatch Online Docs: https://docs.aws.amazon.com/AmazonCloudWatch/latest/monitoring/Install-CloudWatch-Agent.html
2. Pete Freitag blog post: https://www.petefreitag.com/item/868.cfm
