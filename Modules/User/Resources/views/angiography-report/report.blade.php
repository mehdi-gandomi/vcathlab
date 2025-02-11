please write coronary angiography detailed report for LM, LAD, D1, D2, LCX, OM1, OM2, RCA, PLV, PDA, RAMUS, for vessel with empty field write normal and without stenosis except RAMUS, write text (at least one line) for each vessel, patient, significant finding, clinical background (viability as CMR)


Angiography Report

Dominant: {{$dominant}}
Left Main (LM): {{$LM}}
Left Anterior Descending (LAD): {{$LAD}}
Diagonal.1: {{$Diagonal1}}
Diagonal.2: {{$Diagonal2}}
Left Circumfles (LCX): {{$lcx}}
OM1: {{$om1}}
OM2: {{$om2}}
RCA: {{$rca}}
PDA: {{$pda}}
PLV: {{$plv}}
Ramus: {{$ramus}}


Information

Name: {{$name}}
Age: {{$age}}
Physician: {{$physician}}
Gender: {{$gender == 1 ? "Male":"Female"}}
Date: {{$date}}


Morphology

Bifurcation: {{$bifurcation == 1 ? "Yes":"No"}}
Trifurcation: {{$trifurcation == 1 ? "Yes":"No"}}
Aorto Ostial Lesion: {{$aortoOstialLesion == 1 ? "Yes":"No"}}
Severe Tortuosity: {{$severeTortuosity == 1 ? "Yes":"No"}}
Severe Calcification: {{$severeCalcification == 1 ? "Yes":"No"}}
Long Lesion: {{$longLesion == 1 ? "Yes":"No"}}
Thrombus: {{$thrombus == 1 ? "Yes":"No"}}
PVD: {{$pvd == 1 ? "Yes":"No"}}
COPD: {{$copd == 1 ? "Yes":"No"}}
LVEF: {{$lvef}}
CrCl: {{$crcl}}


Risk Factors

Hypertension: {{$hypertension == 1 ? "Yes":"No"}}
Hyperlipidemia: {{$hyperlipidemia == 1 ? "Yes":"No"}}
Family History: {{$family_history == 1 ? "Yes":"No"}}
Diabetic: {{$diabetic == 1 ? "Yes":"No"}}
MI history: {{$mi_history == 1 ? "Yes":"No"}}
Smoker: {{$smoker == 1 ? "Yes":"No"}}
Symptoms: {{$symptoms}}


"Stenosis Condition:
if (EF < 40%) for revascularization viability assessment is necessary
Stenosis Percentage < 25% indicate mild stenosis
Stenosis Percentage (25%-49%) indicate mild to moderate stenosis (NiFFR assessment for recommendation)
Stenosis Percentage (50%-69%) indicate moderate stenosis (NiFFR assessment for recommendation)
Stenosis Percentage (70%-89%) indicate moderate to severe stenosis 
Stenosis Percentage (90%-98%) indicate significant stenosis
Stenosis Percentage (99%) indicate sub-total
Stenosis Percentage (100%) indicate cut-off or complete occlusion"
"For Calculating Syntax score I
Definition stenosis percentage (Diameter Stenosis: DS%):
DS% = 0.0, (Normal, Patent, intact, No significant, Without stenosis, no stenosis)
DS% = 20%-40% (mild, non-significant)
DS% = 30%- 50% (mild, non-significant)
DS% = 50%-70% (moderate, NiFFR assessment)
DS% = 70%-80% (moderate to severe, significant)
DS% = 80%-90% (significant)
DS%= 99% (Sub-total)
DS% = 100% (Cut-ff)
if stenosis is diffiuse or muscle bridge, then segment score = 0.0
If stenosis is =< 50% (Muscle bridge, diffiuse and non-significant), 
{
the segment score = 0.
}
If stenosis is > 50% (significant), the segment scoring is
{
Segment Scores for Right Dominant and Left Dominant:
if Right Dominant:
{
- RCA proximal or ostial portion > 50%(significant): 5
- RCA mid portion > 50%(significant): 2
- RCA distal portion > 50%(significant): 2
- PDA > 50%(significant): 2
- PLV > 50%(significant): 1
- *Left Dominant:*
- RCA proximal or ostial portion > 50%(significant): 0
- RCA mid portion > 50%(significant): 0
- RCA distal portion > 50%(significant): 0
- PDA > 50%(significant): 0
- PLV > 50%(significant): 0
}
Common Scores for Both Dominances:
{
- Left Main > 50%(significant): Right Dominant = 10, Left Dominant = 12
- LAD proximal or ostial portion > 50%(significant): 7
- LAD mid portion > 50%(significant): 5
- LAD apical > 50%(significant): 2
- Diagonal 1 > 50%(significant): 2
- Diagonal 2 > 50%(significant): 1
- LCX proximal or ostial portion > 50%(significant): Right Dominant = 3, Left Dominant = 5
- LCX mid portion > 50%(significant): 2
- LCX distal portion > 50%(significant): Right Dominant = 1, Left Dominant = 3
- OM1 > 50%(significant): Right Dominant = 1, Left Dominant = 2
- OM2 > 50%(significant): Right Dominant = 1, Left Dominant = 2
}
Morphology Scoring
- Aortic ostial lesion: If yes, add 1
- Severe calcification: If yes, add 2
- Severe tortuosity: If yes, add 2
- Thrombus: If yes, add 1
- If none of the above conditions are present, morphology score is 0.

Syntax Score Calculation
- Syntax Score = Morphology Score + Segment Scoring
"""
"For calculating Syntax score II  
For CABG
{
if (LVEF < 40%) then viability assessment by CMR is neccessary
if (Age >=40 and Age <= 80)
{
T_age = ABS(0.75*Age – 30)
}

if Age < 40
{
  T_age = 0
}

if Age > 80
{
  T_age = 30
}

if (CrCl <=90 and CrCl >=30)
{
T_CrCl = ABS(-0.1167*CrCL + 10.503)
}

if CrCl > 90
{
  T_CrCl = 0
}

if CrCl < 30
{
  T_CrCl = 7
}

if (LVEF <=50 and LVEF>=20)
{
T_LVEF = ABS(-0.2*LVEF + 10)
}

if LVEF > 50
{
  T_LVEF = 0
}

if LVEF <= 20
{
  T_LVEF = 6
}

If LM stenosis >= 50% (T_LM = 5)
If LM stenosis < 50% (T_LM = 0)
If Gender = female (T_Gender = 0)
If Gender = Male (T_Gneder = 6)
If COPD = no (T_COPD = 0)
If COPD = yes (T_COPD = 13)
If PVD = no (T_PVD = 0)
If PVD = yes (T_PVD = 12)
}
Syntax score II for CABG = (T_age + T_CrCl + T_LVEF + T_LM + T_Gender + T_COPD + T_PVD)

4 year mortality for CABG =  0.0004*(Syntax score II for CABG)^3 - 0.0131*(Syntax score II for CABG)^2 + 0.2556*(Syntax score II for CABG) - 0.1039


For calculating Syntax score II  
For PCI
{

if (Age >=40 and Age <= 80)
{
T_age = ABS(0.325*Age – 13)
}

if Age < 40
{
  T_age = 0
}

if Age > 80
{
  T_age = 12
}

if (CrCl <=90 and CrCl >=30)
{
T_CrCl = ABS(-0.25*CrCL + 22.5)
}

if CrCl > 90
{
  T_CrCl = 0
}

if CrCl < 30
{
  T_CrCl = 15
}

if (LVEF <=50 and LVEF>=20)
{
T_LVEF = ABS(-0.703*LVEF + 35.16)
}

if LVEF > 50
{
  T_LVEF = 0
}

if LVEF <= 20
{
  T_LVEF = 21
}

if (Syntax_score <=60 and Syntax_score>=0)
{
T_syntax score = (Syntax_score * 0.28) + 8
}

if Syntax_score > 60
{
  T_syntax score = 25
}

if Syntax_score <= 0
{
  T_syntax score = 7
}

If LM stenosis >= 50% (T_LM = 0)
If LM stenosis < 50% (T_LM = 3)
If Gender = female (T_Gender = 7)
If Gender = Male (T_Gneder = 0)
If COPD = no (T_COPD = 0)
If COPD = yes (T_COPD = 5)
If PVD = no (T_PVD = 0)
If PVD = yes (T_PVD = 13)
}
Syntax score II for PCI = (T_syntax score + T_age + T_CrCl + T_LVEF + T_LM + T_Gender + T_COPD + T_PVD)

4 year mortality for PCI =  0.0004*(Syntax score II for PCI)^3 - 0.0131*(Syntax score II for PCI)^2 + 0.2556*(Syntax score II for PCI) - 0.1039"
"please calculate DAPT score for bleeding risk

if Age >= 75 then point_Age = -2
if Age (65-75) then point_Age = -1
if Age < 65 then point_Age = 0

if smoker = yes then point_smoker = 1
if smoker = no then point_smoker = 0

if Diabetic = yes then point_Diabetic = 1
if Diabetic = no then point_Diabetic = 0

if Prior PCI or MI then point_prior PCI = 1

if LVEF < 30% then point_LVEF = 2
if LVEF >=30% then point_LVEF = 0

if vein graft stent then point_vein graft stent = 2

total_point = point_age + point_smoker + point_prior PCI + point_LVEF + point_vein graft stent + point_Diabetic

if total point <=1 then ischemia and bleeding risk is low, prolonged DAPT not recommended
if total point >=2 then ischemia and bleeding risk is high, prolonged DAPT recommended
"
please calculate syntax score I and DAPT and II and 4 year mortality (only number without calculation and formula and score). if (syntax score < 5) then not write syntax score II or 4 year mortality, if syntax score >=5 then write syntax score II or 4 year mortality of (CABG and PCI), (only number without calculation and formula and score), detailed first choice of recommendation based on AI cardiologist 
non viable and fixed in anterior and inferior wall
