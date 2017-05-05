	.file	"2x2.c"
	.section	.rodata
	.align 4
.LC0:
	.string	"\nEnter the elements of first matrix:"
.LC1:
	.string	"%d"
	.align 4
.LC2:
	.string	"\nEnter the elements of second matrix:"
.LC3:
	.string	"\nSum of entered matrices:"
.LC4:
	.string	"%d\t%d\n%d\t%d\n\n"
	.text
	.globl	main
	.type	main, @function
main:
.LFB0:
	.cfi_startproc
	pushl	%ebp
	.cfi_def_cfa_offset 8
	.cfi_offset 5, -8
	movl	%esp, %ebp
	.cfi_def_cfa_register 5
	pushl	%esi
	pushl	%ebx
	andl	$-16, %esp
	subl	$96, %esp
	movl	$.LC0, (%esp)
	.cfi_offset 3, -16
	.cfi_offset 6, -12
	call	puts
	movl	$0, 92(%esp)
	jmp	.L2
.L3:
	movl	92(%esp), %eax
	leal	0(,%eax,4), %edx
	leal	60(%esp), %eax
	addl	%eax, %edx
	movl	$.LC1, %eax
	movl	%edx, 4(%esp)
	movl	%eax, (%esp)
	call	__isoc99_scanf
	addl	$1, 92(%esp)
.L2:
	cmpl	$3, 92(%esp)
	jle	.L3
	movl	$.LC2, (%esp)
	call	puts
	movl	$0, 92(%esp)
	jmp	.L4
.L5:
	movl	92(%esp), %eax
	leal	0(,%eax,4), %edx
	leal	76(%esp), %eax
	addl	%eax, %edx
	movl	$.LC1, %eax
	movl	%edx, 4(%esp)
	movl	%eax, (%esp)
	call	__isoc99_scanf
	addl	$1, 92(%esp)
.L4:
	cmpl	$3, 92(%esp)
	jle	.L5
	movl	$.LC3, (%esp)
	call	puts
	movl	$0, 92(%esp)
	jmp	.L6
.L7:
	movl	92(%esp), %eax
	movl	60(%esp,%eax,4), %edx
	movl	92(%esp), %eax
	movl	76(%esp,%eax,4), %eax
	addl	%eax, %edx
	movl	92(%esp), %eax
	movl	%edx, 44(%esp,%eax,4)
	addl	$1, 92(%esp)
.L6:
	cmpl	$3, 92(%esp)
	jle	.L7
	movl	56(%esp), %esi
	movl	52(%esp), %ebx
	movl	48(%esp), %ecx
	movl	44(%esp), %edx
	movl	$.LC4, %eax
	movl	%esi, 16(%esp)
	movl	%ebx, 12(%esp)
	movl	%ecx, 8(%esp)
	movl	%edx, 4(%esp)
	movl	%eax, (%esp)
	call	printf
	movl	$0, %eax
	leal	-8(%ebp), %esp
	popl	%ebx
	.cfi_restore 3
	popl	%esi
	.cfi_restore 6
	popl	%ebp
	.cfi_def_cfa 4, 4
	.cfi_restore 5
	ret
	.cfi_endproc
.LFE0:
	.size	main, .-main
	.ident	"GCC: (Ubuntu/Linaro 4.6.3-1ubuntu5) 4.6.3"
	.section	.note.GNU-stack,"",@progbits
