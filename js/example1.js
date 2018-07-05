// Run from command line with jjs example1.js

var today = new Date();
var hourNow = today.getHours();
var greeting;

if (hourNow > 18){
  greeting = 'Good evening';
} else if (hourNow > 12){
  greeting = 'Good afternoon';
} else if (hourNow > 0){
  greeting = 'Good morning';
} else {
  greeting = 'Welcome';
}
print(greeting);
