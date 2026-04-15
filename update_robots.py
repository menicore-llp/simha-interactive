import os

root_dir = r"c:\Users\Nirmal Patel\Desktop\MC\madhu\resources\views"
meta_tag = '  <meta name="robots" content="noindex, nofollow">\n'

for root, dirs, files in os.walk(root_dir):
    for file in files:
        if file.endswith(".blade.php"):
            filepath = os.path.join(root, file)
            with open(filepath, 'r', encoding='utf-8', errors='ignore') as f:
                content = f.read()
            
            if '<head>' in content and 'name="robots"' not in content:
                print(f"Updating: {filepath}")
                new_content = content.replace('<head>', f'<head>\n{meta_tag}')
                with open(filepath, 'w', encoding='utf-8') as f:
                    f.write(new_content)
