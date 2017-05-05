	.file	"ls.c"
	.section	.rodata
.LC0:
	.string	"\nPlease enter the size of N:"
.LC1:
	.string	"%d"
.LC2:
	.string	"\nPlease the numbers:"
.LC3:
	.string	"\nSmallest number: %d"
.LC4:
	.string	"\nLargest number: %d\n\n"
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
	andl	$-16, %esp
	subl	$4032, %esp
	movl	$.LC0, (%esp)
	call	puts
	movl	$.LC1, %eax
	leal	4016(%esp), %edx
	movl	%edx, 4(%esp)
	movl	%eax, (%esp)
	call	__isoc99_scanf
	movl	$.LC2, (%esp)
	call	puts
	movl	$0, 4020(%esp)
	jmp	.L2
.L3:
	movl	4020(%esp), %eax
	leal	0(,%eax,4), %edx
	leal	16(%esp), %eax
	addl	%eax, %edx
	movl	$.LC1, %eax
	movl	%edx, 4(%esp)
	movl	%eax, (%esp)
	call	__isoc99_scanf
	addl	$1, 4020(%esp)
.L2:
	movl	4016(%esp), %eax
	cmpl	%eax, 4020(%esp)
	jl	.L3
	movl	$0, 4020(%esp)
	jmp	.L4
.L8:
	movl	4020(%esp), %eax
	addl	$1, %eax
	movl	%eax, 4024(%esp)
	jmp	.L5
.L7:
	movl	4020(%esp), %eax
	movl	16(%esp,%eax,4), %edx
	movl	4024(%esp), %eax
	movl	16(%esp,%eax,4), %eax
	cmpl	%eax, %edx
	jge	.L6
	movl	4020(%esp), %eax
	movl	16(%esp,%eax,4), %eax
	movl	%eax, 4028(%esp)
	movl	4024(%esp), %eax
	movl	16(%esp,%eax,4), %edx
	movl	4020(%esp), %eax
	movl	%edx, 16(%esp,%eax,4)
	movl	4024(%esp), %eax
	movl	4028(%esp), %edx
	movl	%edx, 16(%esp,%eax,4)
.L6:
	addl	$1, 4024(%esp)
.L5:
	movl	4016(%esp), %eax
	cmpl	%eax, 4024(%esp)
	jl	.L7
	addl	$1, 4020(%esp)
.L4:
	movl	4016(%esp), %eax
	cmpl	%eax, 4020(%esp)
	jl	.L8
	movl	4016(%esp), %eax
	subl	$1, %eax
	movl	16(%esp,%eax,4), %edx
	movl	$.LC3, %eax
	movl	%edx, 4(%esp)
	movl	%eax, (%esp)
	call	printf
	movl	16(%esp), %edx
	movl	$.LC4, %eax
	movl	%edx, 4(%esp)
	movl	%eax, (%esp)
	call	printf
	movl	$0, %eax
	leave
	.cfi_restore 5
	.cfi_def_cfa 4, 4
	ret
	.cfi_endproc
.LFE0:
	.size	main, .-main
	.ident	"GCC: (Ubuntu/Linaro 4.6.3-1ubuntu5) 4.6.3"
	.section	.note.GNU-stack,"",@progbits
