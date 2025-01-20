











#This is not working in my windows 10











require 'mail'
require 'logger' # Require the Logger class

# Initialize a logger for your script
logger = Logger.new(STDOUT)

# Configure the mail settings
Mail.defaults do
  delivery_method :smtp, {
    address: "smtp.gmail.com",  # SMTP server address
    port: 587,                 # Port for sending mail
    domain: 'gmail.com',       # Your domain
    user_name: 'rupacepoudel@gmail.com',  # Your email
    password: '',              # We will update this later dynamically
    authentication: 'plain',
    enable_starttls_auto: true
  }
end

# Compose and send the email
mail = Mail.new do
  from    'rupacepoudel@gmail.com'      # Sender's email
  to      'poudelrupace@gmail.com'      # Recipient's email
  subject 'Test Email from Ruby Script' # Email subject
  body    'Hello! This is a test email sent from a Ruby script.' # Email body
end

begin
  # Prompt for password input
  print "Enter your email password: "
  password = gets.strip

  puts "\nPassword received. Sending email..."
  # Assign password dynamically to mail settings
  Mail.defaults do
    delivery_method :smtp, {
      address: "smtp.gmail.com",
      port: 587,
      domain: 'gmail.com',
      user_name: 'rupacepoudel@gmail.com',
      password: password,  # Use the entered password
      authentication: 'plain',
      enable_starttls_auto: true
    }
  end

  logger.info("Starting to send email...")
  mail.deliver!
  puts "Email sent successfully!"
  logger.info("Email sent successfully.")
rescue => e
  logger.error("Failed to send email: #{e.message}")
  puts "Failed to send email. Error: #{e.message}"
end
