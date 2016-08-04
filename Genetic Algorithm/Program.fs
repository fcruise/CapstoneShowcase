/**
* Written by James Galloway (n9198865) as part of his assessment for:
* Queensland University of Technology - CAB402 - Programming Paradigms - Assignment 1
*/
﻿
﻿open System

open GeneticAlgorithm.GlobalParameters
open GeneticAlgorithm.GeneticOperators

[<EntryPoint>]
let main argv = 
    let mutable genNum = 1 
    let mutable Population = Populate MaxPop
    
    while true do
        Population <- Evaluate genNum Population |> 
            Select |>
            Mutate |> 
            AssembleNextGeneration Population
        genNum <- genNum + 1

    Console.ReadKey() |> ignore
    0
