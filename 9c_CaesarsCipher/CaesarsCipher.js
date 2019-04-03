function rot13(str) {
  // LBH QVQ VG!
  let convertedStr = "";
  const rot13Convert = {
    A: "N",
    B: "O",
    C: "P",
    D: "Q",
    E: "R",
    F: "S",
    G: "T",
    H: "U",
    I: "V",
    J: "W",
    K: "X",
    L: "Y",
    M: "Z",
    N: "A",
    O: "B",
    P: "C",
    Q: "D",
    R: "E",
    S: "F",
    T: "G",
    U: "H",
    V: "I",
    W: "J",
    X: "K",
    Y: "L",
    Z: "M"
  };

  for (let i = 0; i < str.length; i++) {
    for (let letter in rot13Convert) {
      if (str[i] == letter) {
        convertedStr = convertedStr + rot13Convert[letter];
      }
    }
    if (rot13Convert.hasOwnProperty(str[i]) == false) {
      convertedStr = convertedStr + str[i];
    }
  }
  return convertedStr;
}

// Change the inputs below to test
rot13("SERR CVMMN!");
