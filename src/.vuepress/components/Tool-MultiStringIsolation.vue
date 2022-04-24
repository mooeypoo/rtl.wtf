<template lang="html">
  <div>
    <div class="inputdetails">
      <v-simple-table dense>
        <template v-slot:default>
          <tbody>
            <tr>
              <td><v-text-field outlined v-model="fieldContent[1]" label="Field #1"></v-text-field></td>
              <td><v-text-field outlined v-model="fieldContent[2]" label="Field #2"></v-text-field></td>
              <td><v-text-field outlined v-model="fieldContent[3]" label="Field #3"></v-text-field></td>
            </tr>
            <tr>
              <td><v-switch v-model="parenthsForField[1]" label="Wrap with parentheses"></v-switch></td>
              <td><v-switch v-model="parenthsForField[2]" label="Wrap with parentheses"></v-switch></td>
              <td><v-switch v-model="parenthsForField[3]" label="Wrap with parentheses"></v-switch></td>
            </tr>
            <tr>
              <td><v-switch v-model="bdiForField[1]" label="Wrap with &lt;bdi&gt;"></v-switch></td>
              <td><v-switch v-model="bdiForField[2]" label="Wrap with &lt;bdi&gt;"></v-switch></td>
              <td><v-switch v-model="bdiForField[3]" label="Wrap with &lt;bdi&gt;"></v-switch></td>
            </tr>
          </tbody>
        </template>
      </v-simple-table>
    </div>
    <h3>Rendering:</h3>
      <v-simple-table dense>
        <template v-slot:default>
          <thead>
            <tr>
              <th>Plain text</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><code>{{returnRawStringForView(1, true)}} {{returnRawStringForView(2, true)}} {{returnRawStringForView(3, true)}}</code></td>
            </tr>
            <tr>
              <td>
                <Tool-MultiStringIsolation-piece :value="fieldContent[1]" :parenths="parenthsForField[1]"/>
                <Tool-MultiStringIsolation-piece :value="fieldContent[2]" :parenths="parenthsForField[2]"/>
                <Tool-MultiStringIsolation-piece :value="fieldContent[3]" :parenths="parenthsForField[3]"/>
              </td>
            </tr>
          </tbody>
        </template>
      </v-simple-table>
      <v-simple-table dense>
        <template v-slot:default>
          <thead>
            <tr>
              <th>With html tags</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><code>{{returnRawStringForView(1)}} {{returnRawStringForView(2)}} {{returnRawStringForView(3)}}</code></td>
            </tr>
            <tr>
              <td>
                <Tool-MultiStringIsolation-piece :value="fieldContent[1]" :bdi="bdiForField[1]" :parenths="parenthsForField[1]"/>
                <Tool-MultiStringIsolation-piece :value="fieldContent[2]" :bdi="bdiForField[2]" :parenths="parenthsForField[2]"/>
                <Tool-MultiStringIsolation-piece :value="fieldContent[3]" :bdi="bdiForField[3]" :parenths="parenthsForField[3]"/>
              </td>
            </tr>
          </tbody>
        </template>
      </v-simple-table>
  </div>
</template>

<script>
export default {
  data: () => ({
    fieldContent: {
      1: 'Test string',
      2: 'עברית עם אנגלית (english parenthetical)',
      3: 'ויקידאטא Q12345',
    },
    parenthsForField: {
      1: false,
      2: true,
      3: false
    },
    bdiForField: {
      1: false,
      2: false,
      3: true
    }
  }),
  methods: {
    returnRawStringForView(index, plainText = false) {
      let text = 'field' + index;

      text = this.parenthsForField[index] ?
        '(' + text + ')' :
        text

      if (!plainText) {
        if (this.bdiForField[index]) {
          text = `<bdi>${text}</bdi>`;
        } else {
          // Only wrap in span if there's no <bdi> to match the <Tool-MultiStringIsolation-piece> component
          text = `<span>${text}</span>`;
        }
      }

      return text
    }
  }
}
</script>

<style scoped>
.v-text-field--outlined {
  margin-top: 12px;
}
</style>