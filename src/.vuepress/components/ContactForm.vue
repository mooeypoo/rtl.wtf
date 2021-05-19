<template>
  <form name="contact" method="POST" data-netlify-recaptcha="true" data-netlify="true" netlify>
    <div class="contact-section contact-email">
      <label for="email">Email:</label>
      <input type="email" name="email" class="contact-email" placeholder="your@email.com" />
    </div>

    <div class="contact-section contact-message">
      <label for="message">Message:</label>
      <textarea name="message" class="contact-message"></textarea>
    </div>
    
    <div data-netlify-recaptcha="true"></div>
    
    <div class="contact-send">
      <button class="contact-button" type="submit">Send</button>
    </div>
  </form>
</template>

<style scoped>
form {
  margin: 2em 0;
}
.contact-section {
  width: 100%;
  max-width: 500px;
  display: flex;
  justify-content: space-between;
  margin: 1em auto;
}

.contact-email,
.contact-message {
  width: 100%;
  padding: 0.7em;
}

.contact-email {
  padding: 0.5em;
}

.contact-send {
  margin: 0 auto;
  text-align: center;
}

.contact-send button {
  padding: 10px;
  font-size: 1.5em;
  font-weight: bold;
  background-color: transparent;
  border: 1px solid #666;
  border-radius: 5px;
}

label {
  padding: 0 1em;
}
</style>