<template>
  <v-app>
    <v-alert
      v-if="successful"
      dense
      text
      type="success"
    >
      Your message was sent! Thank you!
    </v-alert>
    <v-alert
      v-if="failure"
      dense
      text
      type="error"
    >
      We couldn't sent your message. Maybe something was missing?
    </v-alert>
    <v-form
      v-if="!successful"
      name="contact"
      method="POST"
      @submit.prevent="onSubmit"
      data-netlify="true"
      data-netlify-honeypot="bot-field"
      netlify
      v-model="valid"
    >
      <input type="hidden" name="form-name" value="contact" />
      <v-text-field
        v-model="email"
        :rules="emailRules"
        name="email"
        label="Email"
      ></v-text-field>

      <v-select
        v-model="select"
        :items="items"
        :rules="[v => !!v || 'Please select...']"
        label="I'd like to..."
        required
      ></v-select>

      <div data-netlify-recaptcha="true"></div>
      
      <v-textarea
        v-model="message"
        :rules="[v => !!v || 'Message is required...']"
        name="message"
        label="Message"
      ></v-textarea>

      <v-btn
        :disabled="!valid"
        type="submit"
        color="primary"
        elevation="2"
        x-large
      >Submit</v-btn>
    </v-form>
  </v-app>
</template>

<script>
import axios from "axios";

export default {
  name: 'ContactForm',
  data: () => ({
    valid: true,
    successful: false,
    failure: false,
    message: '',
    email: '',
    emailRules: [
      v => !!v || 'E-mail is required',
      v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
    ],
    select: null,
    items: [
      'Request a speaking opportunity',
      'Connect or networking',
      'Consultation',
      'Other',
    ],
  }),
  methods: {
    onSubmit () {
      axios.post(
        '/',
        {
          method: 'POST',
          body: new URLSearchParams({
            'form-name': 'contact',
            email: this.email,
            topic: this.select,
            message: this.message
          }).toString()
        },
        {
          header: { "Content-Type": "application/x-www-form-urlencoded" },
        }
      )
        .then(() => this.successful = true)
        .catch((error) => {
          this.failure = true
          console.log('Netlify form error', error);
        })
    }
  }
}
</script>

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