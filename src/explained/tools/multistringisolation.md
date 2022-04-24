# Demo: BiDi isolation

This page can help you understand the problem of displaying strings that are made up of multiple pieces -- each potentially with different directionalities. This is common when dealing with user-generated text, or with results that come from mixed sources, like searches. 

You can play around with the demo here. Scroll down to read more about the problem statement and explanation.

## Dynamic demo

<v-alert type="info" border="left" outlined>

* You can view the results both in the RTL experience or the LTR one to note how the **general context directionality** impacts the results. You can switch between those states in the blue bar at the bottom of the page.
* If your inputs contain mixed directionality internally, watch carefully for the **logical** ordering of the pieces (what should come "first" and what "last" and what direction these mean). You can validate the logical direction by starting from the beginning (click "home"), clicking "shift" to start selecting, and moving with the "forward" arrow.
* In RTL.WTF mode, you may notice that the toggle labels appear "broken" -- the &lt; is at the other end of the string, appearing to be wrong. This is because the string is LTR in an RTL context without isolation. **This is another demonstration** of why you should use &lt;bdi&gt; wrapper around directionalities that are different than the general context.

</v-alert>

**Note:** The initial values represent strings that can cause common BiDirectionality issues without isolation. You can change the values of the inputs according to your needs to see the results.

<Tool-MultiStringIsolation />

## Problem statement

It's very common for many tools and components to output mixed directionality within the same displayed string. This is especially true for components that display user-generated content, or ones that are aimed at displaying content from potentially multiple languages, like search boxes.

Displaying a single string that may content multiple directionalities is a tricky endeavor. It can get very complicated to display these properly, especially depending on the strings used, on which direction starts, on where the changes happen, on how many of those language combinations they involve, etc.

As a general rule of thumb, the recommendation is to individually isolate each known piece of the string as they're combined: This means that the internal structure of the resulting sentence is **usually** rendered correctly, regardless of the overall RTL or LTR context of the entire page.

