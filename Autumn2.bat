@echo off
cls
:start
echo 1.WinMF
echo 2.WinMF
echo 3.WinCT
echo 4.WinTR
echo 5.WinRH
echo 6.WinLF
echo 7.WinEP
echo.

set/p X=iniciar:
IF [%x%]==[1] GOTO NUM_1
IF [%x%]==[2] GOTO NUM_2
IF [%x%]==[3] GOTO NUM_3
IF [%x%]==[4] GOTO NUM_4
IF [%x%]==[5] GOTO NUM_5
IF [%x%]==[6] GOTO NUM_6
IF [%x%]==[7] GOTO NUM_7

:NUM_1
start \\192.168.0.17\Sistemas\WinMF.Exe
exit

:NUM_2

start \\192.168.0.17\Sistemas\WinMF.Exe
exit

:NUM_3

start \\192.168.0.17\Sistemas\WinCT.Exe
exit

:NUM_4

start \\192.168.0.17\Sistemas\WinTR.Exe
exit

:NUM_5

start \\192.168.0.17\Sistemas\WinRH.Exe
exit

:NUM_6

start \\192.168.0.17\Sistemas\WinLF.Exe
exit


:NUM_7

start \\192.168.0.17\Sistemas\WinEP.Exe
exit
