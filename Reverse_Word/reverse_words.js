function reverseWords(sentence) {
  // Split the sentence into an array of words
  const words = sentence.split(' ');

  // Iterate through each word in the array
  for (let i = 0; i < words.length; i++) {
    // Reverse the word by converting it to an array, reversing the array, and joining it back into a string
    words[i] = words[i].split('').reverse().join('');
  }

  // Join the reversed words back into a sentence with spaces between them
  return words.join(' ');
}

// Example usage
const sentence = 'Welcome to this Javascript Guide!';
const reversed = reverseWords(sentence);
console.log(reversed); // Output: emocleW ot siht tpircsavaJ !ediuG