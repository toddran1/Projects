	.file	"order.c"
	.section	.rodata
.LC0:
	.string	"\nPlease enter 5 numbers:"
.LC1:
	.string	"%d"
.LC2:
	.string	"\nSorted array (descending):"
.LC3:
	.string	"%d  "
.LC4:
	.string	"\n"
	.text
	.globl	swap
	.type	swap, @function
swap:
.LFB0:
	.cfi_startproc
	pushl	%ebp
	.cfi_def_cfa_offset 8
	.cfi_offset 5, -8
	movl	%esp, %ebp
	.cfi_def_cfa_register 5
	subl	$56, %esp
	movl	$.LC0, (%esp)
	call	puts
	movl	$0, -20(%ebp)
	jmp	.L2
.L3:
	movl	-20(%ebp), %eax
	leal	0(,%eax,4), %edx
	leal	-40(%ebp), %eax
	addl	%eax, %edx
	movl	$.LC1, %eax
	movl	%edx, 4(%esp)
	movl	%eax, (%esp)
	call	__isoc99_scanf
	addl	$1, -20(%ebp)
.L2:
	movl	-20(%ebp), %eax
	cmpl	8(%ebp), %eax
	jl	.L3
	movl	$0, -20(%ebp)
	jmp	.L4
.L8:
	movl	-20(%ebp), %eax
	addl	$1, %eax
	movl	%eax, -16(%ebp)
	jmp	.L5
.L7:
	movl	-20(%ebp), %eax
	movl	-40(%ebp,%eax,4), %edx
	movl	-16(%ebp), %eax
	movl	-40(%ebp,%eax,4), %eax
	cmpl	%eax, %edx
	jge	.L6
	movl	-20(%ebp), %eax
	movl	-40(%ebp,%eax,4), %eax
	movl	%eax, -12(%ebp)
	movl	-16(%ebp), %eax
	movl	-40(%ebp,%eax,4), %edx
	movl	-20(%ebp), %eax
	movl	%edx, -40(%ebp,%eax,4)
	movl	-16(%ebp), %eax
	movl	-12(%ebp), %edx
	movl	%edx, -40(%ebp,%eax,4)
.L6:
	addl	$1, -16(%ebp)
.L5:
	movl	-16(%ebp), %eax
	cmpl	8(%ebp), %eax
	jl	.L7
	addl	$1, -20(%ebp)
.L4:
	movl	-20(%ebp), %eax
	cmpl	8(%ebp), %eax
	jl	.L8
	movl	$.LC2, (%esp)
	call	puts
	movl	$0, -20(%ebp)
	jmp	.L9
.L10:
	movl	-20(%ebp), %eax
	movl	-40(%ebp,%eax,4), %edx
	movl	$.LC3, %eax
	movl	%edx, 4(%esp)
	movl	%eax, (%esp)
	call	printf
	addl	$1, -20(%ebp)
.L9:
	movl	-20(%ebp), %eax
	cmpl	8(%ebp), %eax
	jl	.L10
	movl	$.LC4, (%esp)
	call	puts
	leave
	.cfi_restore 5
	.cfi_def_cfa 4, 4
	ret
	.cfi_endproc
.LFE0:
	.size	swap, .-swap
	.globl	main
	.type	main, @function
main:
.LFB1:
	.cfi_startproc
	pushl	%ebp
	.cfi_def_cfa_offset 8
	.cfi_offset 5, -8
	movl	%esp, %ebp
	.cfi_def_cfa_register 5
	andl	$-16, %esp
	subl	$32, %esp
	movl	$5, 28(%esp)
	movl	28(%esp), %eax
	movl	%eax, (%esp)
	call	swap
	movl	$0, %eax
	leave
	.cfi_restore 5
	.cfi_def_cfa 4, 4
	ret
	.cfi_endproc
.LFE1:
	.size	main, .-main
	.ident	"GCC: (Ubuntu/Linaro 4.6.3-1ubuntu5) 4.6.3"
	.section	.note.GNU-stack,"",@progbits
