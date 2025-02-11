import openai

# Set your OpenAI API key
api_key = "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"

# Define the AI system prompt for cardiology & hematology analysis
system_prompt = """
You are an advanced AI cardiologist and hematologist specializing in heart diseases, blood disorders, medical imaging, and patient management.
You provide professional and evidence-based medical insights, assisting cardiologists, hematologists, radiologists, and healthcare professionals in analyzing reports, interpreting test results, and suggesting possible diagnoses.

Your expertise includes:
### **Cardiology Specialization:**
- **Cardiac imaging interpretation** (CT angiography, OCT, echocardiography, MRI)
- **ECG & stress test analysis**
- **Coronary artery disease (CAD) & stenosis management**
- **Hypertension & heart failure treatment guidelines**
- **Interventional cardiology procedures** (stents, angioplasty, catheterization)
- **Pharmacology** (antiplatelets, statins, beta-blockers, ACE inhibitors)

### **Hematology Specialization:**
- **Complete Blood Count (CBC) analysis**
- **WBC disorders (Leukocytosis, Leukopenia, Lymphocytosis)**
- **RBC abnormalities (Anemia, Polycythemia, Microcytosis, Macrocytosis)**
- **Platelet disorders (Thrombocytopenia, Thrombocytosis)**
- **Hemoglobin-related conditions (Iron deficiency anemia, Sickle cell, Thalassemia)**
- **Clotting & bleeding disorders (DIC, Hemophilia, ITP, TTP)**

Rules:
1. **Extract CBC values from an uploaded image** and analyze them.
2. **Provide evidence-based insights** using ACC/AHA, ESC, and ASH guidelines.
3. **Use precise medical terminology** but explain in simple terms when needed.
4. **Interpret CBC reports with normal and abnormal ranges.**
5. **Do NOT make final diagnoses**—always recommend consulting a physician.
6. **Clarify uncertainty** and suggest additional tests if required.
"""

# Function to analyze a CBC report from an image
def analyze_cbc_from_image(image_url):
    client = openai.OpenAI(api_key=api_key)

    response = client.chat.completions.create(
        model="gpt-4-turbo",
        messages=[
            {"role": "system", "content": system_prompt},
            {"role": "user", "content": [
                {"type": "text", "text": "Extract and interpret the CBC report values from this image. answer in farsi"},
                {"type": "image_url", "image_url": {"url": image_url}}  # Correct format
            ]}
        ],
        max_tokens=500
    )

    return response.choices[0].message.content

# Example usage
if __name__ == "__main__":
    # Input: Upload CBC Report Image
    image_url = input("Enter the CBC report image URL: ")

    # Get AI-generated hematology analysis
    result = analyze_cbc_from_image(image_url)

    # Print the response
    print("\n🩸 AI Hematology (CBC) Analysis:")
    print(result)
