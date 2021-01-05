# -*- co# Give the location of the file 
loc = (r"G:\documents\tensorflowPoets\Disease.xls") 
# To open Workbook 
wb = xlrd.open_workbook(loc) 
sheet = wb.sheet_by_index(0) 
  
#GOOGLE_APPLICATION_CREDENTIALS='C:\tensorflow1\PlantDiseasePrediction\google-services.json'


# For row 0 and column 0 
str1=sheet.cell_value(1, 1)
str2=sheet.cell_value(1, 2)
str3=sheet.cell_value(1, 3)

max=0
found=0

def find_all(x,col):
    ctr=0
    for i in range(sheet.nrows):
        if i==0:
            continue
        else:
            str1=sheet.cell_value(i, col)
            if str1==x:
                ctr+=1
            
                
    return ctr

def find_before(i,j,x):
    ctr=0
    for k in range(i):
        str1=sheet.cell_value(k, j)
        #print (str1)
        if str1==x:
            ctr=1
            break
                                
    return ctr

max_name=[]
max_freq=[]

for j in range(sheet.ncols):
        if j==0:
            continue
        max=-1
        for i in range(sheet.nrows):
            if i==0:
                continue
            else:
                str1=sheet.cell_value(i, j)
                #print(str1)
                p=find_before(i,j,str1)
                #print(p)
                if p==0:
                    f=find_all(str1,j)
                    if f>max:
                        max=f
                        f1=str1
        #print(f1,max)
        max_name.append(f1)
        max_freq.append(max)                



week=[]
kl=0
name=['Week1-Disease-1','Week1-Disease-2','Week2-D1','Week2-D2','Week3-D1','Week3-D2']
for i in range(sheet.nrows):
    if i==0:
        continue
    else:
        if i==3:
            str1=sheet.cell_value(i,7)
            week.append(float(str1)*100)
            break
        str1=sheet.cell_value(i,6)
        if i==1:
            week.append((float(str1)*100)-95)
        else:
            week.append(float(str1)*100)
print(week)











#print(max_name)
#print(max_freq)
week1=[12,1,45,32,10,90]
# Data to plot
labels = max_name[0], max_name[1], max_name[2], max_name[3],max_name[4]
sizes = [max_freq[0],max_freq[1],max_freq[2],max_freq[3],max_freq[4]]
colors = ['gold', 'yellowgreen', 'lightcoral', 'lightskyblue','green']
explode = (0.1, 0, 0, 0, 0)  # explode 1st slice
 
# Plot
plt.pie(sizes, explode=explode, labels=labels, colors=colors,
autopct='%1.1f%%', shadow=True, startangle=140)
plt.axis('equal')
plt.savefig('Pie_chart.png')   # save the figure to file
plt.show()        












#writing to wordfile
document = Document()

document.add_heading('Disease Prediction Report', 0)

p = document.add_paragraph('This is the report generated from the analysis of video captured by the drone ')
#p.add_run('bold').bold = True
#p.add_run(' and some ')
#p.add_run('italic.').italic = True

document.add_heading('Statistical analysis', level=1)
document.add_paragraph('The below graph shows the distribution of various disease as per our prediction. The prediction is done on the video captured from the drone', style='Intense Quote')
document.add_picture('Pie_chart.png' , width=Inches(4.25))

#document.add_paragraph('Intense quote', style='Intense Quote')

#document.add_paragraph('first item in unordered list', style='List Bullet')
#document.add_paragraph('first item in ordered list', style='List Number')

document.add_heading('Most Severe Disease', level=1)
document.add_paragraph('The two most severe diseases are:')
document.add_paragraph(max_name[0], style='List Number')
document.add_paragraph(max_name[1], style='List Number')

disease_name1=''
disease_name2=''
if max_name[0]=='corn maize cercospora leaf spot gray leaf spot':
    disease_name1='The fungus that causes gray leaf spot is able to survive on residue for more than one year, and economically damaging disease levels have been observed in Indiana fields with two-year-old corn residue. Fungicides are available for in-season gray leaf spot management.'
elif max_name[0]=='dfsa':
    disease_name1='dfsd'     

if max_name[1]=='dfs':
    disease_name2='dfg'
elif max_name[1]=='dfsa':
    disease_name2='dfsd'

document.add_heading('Symptoms and Signs of Fusarium Head Blight', level=1)
document.add_paragraph('Individual plants of cereal crops (e.g. wheat) produce multiple stems, and each stem produces a single seed spike which emerges at the end of the stem.  The spike is composed of multiple spikelets positioned on alternate sides of the spike’s stem.  Each spikelet is composed of flowering structures where seed develops.  The first symptoms of Fusarium head blight occur shortly after flowering. Diseased spikelets exhibit premature bleaching as the pathogen grows and spreads within the head')

document.add_heading('Cure Of Fusarium Head Blight', level=1)
document.add_paragraph('Select rust-resistant plant varieties when available.Pick off and destroy infected leaves and frequently rake under plants to remove all fallen debris.Water in the early morning hours — avoiding overhead sprinklers — to give plants time to dry out during the day.Use a slow-release, organic fertilizer on crops and avoid excess nitrogen.Apply copper sprays or sulfur powders to prevent infection of susceptible plants. For best results, apply early or at first sign of disease. Spray all plant parts thoroughly and repeat every 7-10 days up to the day of harvest.Prune or stake plants and remove weeds to improve air circulation.Use a thick layer of mulch or organic compost to cover the soil after you have raked and cleaned it well. Mulch will prevent the disease spores from splashing back up onto the leaves')
                       
document.add_heading('Cure Of  Diseases Found', level=1)
document.add_paragraph('Cure Of Since 1990, an extensive research endeavor has focused on development and use of resistant cereal cultivars and integrated pest management systems for the control of Fusarium head blight. Thousands of plant lines are subjected to artificial inoculation with F. graminearum (Figure 18). Those lines having reduced fungal growth and low levels of seed contamination with the mycotoxin DON are selected and advanced in additional breeding trials. To date, sources of resistance conferring complete resistance to FHB have not been identified in wheat.  Quantitative Trait Loci (QTL) composed of one or more genes, such as Fhb1 derived from the Chinese wheat cultivar Sumai 3, have been identified in wheat.  However, these genes confer only partial resistance to FHB, and many of the initial sources of resistance were not well adapted to most of the grain production regions of the U.S.  While some success has been made in transferring FHB resistance from such exotic sources into adapted cultivars, identification and deployment of FHB resistance already present in local native germplasm and cultivars is providing another means to achieve this goal.   Ultimately, control of FHB, to meet the very low DON limits in wheat grain, will require an integrated approach including development of cultivars having multiple resistance genes and use of fungicides.')


document.add_heading('Detailed Analysis', level=1)
document.add_paragraph('Below is the indepth report')

new1=()
records1=()
for i in range(sheet.nrows):
        if i==0:
            continue
        l=[]
        for j in range(sheet.ncols-8):
            str1=sheet.cell_value(i, j)
            l.append(str1)
            #print(str1)
        new1=tuple(l)
        records1=records1+(new1,)
                        
#print(records1)
c=0                        
table = document.add_table(rows=1, cols=3)
hdr_cells = table.rows[0].cells
hdr_cells[0].text = 'Name'
hdr_cells[1].text = 'Disease1'
hdr_cells[2].text = 'Disease2'
for qty, id, desc in records1:
    if c==3:
        break
    else:
        row_cells = table.add_row().cells
        row_cells[0].text = str(qty)
        row_cells[1].text = id
        row_cells[2].text = desc
        c+=1
    

document.add_page_break()

document.save('Disease_Report.docx')

