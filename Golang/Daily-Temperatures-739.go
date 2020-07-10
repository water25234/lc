/* 739. Daily Temperatures

Related Topic
Stack, Hash Table

Given a list of daily temperatures T, return a list such that, for each day in the input, tells you how many days you would have to wait until a warmer temperature. If there is no future day for which this is possible, put 0 instead.

For example, given the list of temperatures T = [73, 74, 75, 71, 69, 72, 76, 73], your output should be [1, 1, 4, 2, 1, 1, 0, 0].

Note: The length of temperatures will be in the range [1, 30000]. Each temperature will be an integer in the range [30, 100].
*/

func dailyTemperatures(T []int) []int {
 
    type Pair struct {
		idx int
		val int
	}

	res := make([]int, len(T))
	stack := []Pair{Pair{0, T[0]}}

	for i := 1; i < len(T); i++ {
		for len(stack) > 0 && stack[len(stack)-1].val < T[i] {
			stackIdx := stack[len(stack)-1].idx
			res[stackIdx] = i - stackIdx
			stack = stack[:len(stack)-1]
		}
		stack = append(stack, Pair{i, T[i]})
	}

	return res
    
}