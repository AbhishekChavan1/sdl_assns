require 'mail'

# Set up SMTP settings
Mail.defaults do
  delivery_method :smtp, {
    address: 'smtp.gmail.com',
    port: 587,
    user_name: 'rupesh.anywhere@gmail.com',
    password: ’**** **** ****  ****’,
    authentication: :login,
    enable_starttls_auto: true
  }
end

# Define email message
message = Mail.new do
  from 'rupesh.anywhere@gmail.com'
  to 'rupesh.poudel22@pccoepune.org'
  subject 'Hello from Ruby!'
  body 'This is a test email sent from Ruby.'
end

# Send email
message.deliver!
