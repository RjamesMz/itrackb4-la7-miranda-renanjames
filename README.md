Q1 Your form sends data with POST rather than GET. Explain what would go wrong if it used GET instead. Your answer should say something about what a browser does when a page is refreshed.

A1 The info inputed will be on the url so a sensitive data will be exposed like passwords

Q2 When validation fails, your controller does not run the code that saves the record — and you did not write an if statement to stop it. Explain what actually stops it, and where the visitor ends up.

A2 Laravel will automaticaly stop it the inputed data will just go back form

Q3 Your success message is displayed from the layout, which renders on every page. Explain why it does not appear on every page.
 
A3 The succes message only appears if a object it added, the message is only a flash message so when a user refresh it, it dissapears.