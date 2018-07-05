var el;

function charCount(e)  {
  var textEntered, counter, charDisplay, lastkey;
  textEntered = document.getElementById('message').value;
  charDisplay = document.getElementById('charactersLeft');

  counter = (180 - (textEntered.length));
  charDisplay.innerHTML = 'Characters remaining: ' + counter;

  lastkey = document.getElementById('lastkey');
  lastkey.innerHTML = 'Last key input: ' + String.fromCharCode(e.keyCode)
}

el = document.getElementById('message');
el.addEventListeners('keypress', charCount, false);
