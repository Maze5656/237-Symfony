![Create DB](https://github.com/Maze5656/237-Symfony/blob/lab7/public/uploads/createDatabase.png)
![Query Dump](https://github.com/Maze5656/237-Symfony/blob/lab7/public/uploads/firstQueryDump.png)
![Query Run](https://github.com/Maze5656/237-Symfony/blob/lab7/public/uploads/firstQueryRun.png)

### Mockups
https://app.moqups.com/thewraith476@hotmail.com/3RQZAxZkY9/edit/page/a8a2cbf23

## Instructions on how I set up this project:

### This installation and setup will take place on a Windows 7 machine.

Start by installing composer. Composer's website recommends using their installer, so I will too. 

Download Composer-Setup.exe and run it. Follow the wizard's instructions.

Now create a symfony directory inside of wamp64's directory. Afterwords, the symfony path looks like this:

### wamp64/www/public/symfony/

Open your desired terminal and navigate to this newly created path. Type following command in the terminal:

### composer create-project symfony/website-skeleton LabS

No errors appeared for me. Installation succeeded.

Change directory in terminal to LabS. Download the server with command:

### composer require server --dev

Wait for the download. No errors received. Start the server with command:

### php bin/console server:run

Server will start without issues. 

The terminal will display an http link after you start the server. 

Put the link into your chosen browser to view the symfony default. 
You will get a symfony exception page.

