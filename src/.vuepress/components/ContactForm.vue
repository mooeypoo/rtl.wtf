<template>
  <v-app>
    <v-form
      name="contact"
      method="POST"
      data-netlify-recaptcha="true"
      data-netlify="true"
      netlify
      v-model="valid"
    >
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
export default {
  name: 'ContactForm',
  data: () => ({
    valid: true,
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
  })
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