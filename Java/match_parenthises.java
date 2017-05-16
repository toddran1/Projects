/* Given a line of text, verify that the beginning and ending parenthesis match up. */

import java.util.Stack;
public class Match {

  public static boolean doParensMatch(String str) {
    Stack stack = new Stack<>();
    char c;
    for (int i=0; i < str.length(); i++) {
      c = str.charAt(i);

      if (c == '(' || c == '{') {
        stack.push(c);
      } else if (c == '}') {
        if (stack.empty()) {
          return false;
        } else if (stack.peek() == '{') {
          stack.pop();
        }
      } else if (c == ')') {
        if (stack.empty()) {
          return false;
        } else if (stack.peek() == '(') {
          stack.pop();
        } else {
          return false;
        }
      }
    }
    return stack.empty();
  }

  public static void main(String[] args) {
    System.out.println(doParensMatch(""));
    System.out.println(doParensMatch("()"));
    System.out.println(doParensMatch("{}"));
    System.out.println(doParensMatch("{()}"));
    System.out.println(doParensMatch("{123}"));
    System.out.println(doParensMatch("{)")); // failure
    System.out.println(doParensMatch("{((((((((()")); // failure
  }
}