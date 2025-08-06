[BITS 64]

section .data
	data dq 7


section .text
	global _start

_start:
	mov rax,[data]

